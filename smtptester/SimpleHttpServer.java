import java.util.Properties;

import java.io.ByteArrayOutputStream;
import java.io.PrintStream;
import javax.mail.Address.*;
import javax.mail.Authenticator;
import javax.mail.Message;
import javax.mail.PasswordAuthentication;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;


import java.io.BufferedReader;
import java.io.IOException;
import java.io.OutputStream;
import java.io.InputStreamReader;
import java.net.InetSocketAddress;
import java.net.ServerSocket;
import java.net.Socket;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

class MailSender {
	public static void sendMail(String from, String to, String host, String port, String username, String password, Boolean ssl) {
			System.out.println("preparing to send message ...");
			String message = "Hello, This is a test e-mail from SMTP Server.";
			String subject = "SMTP Test E-Mail";
		
            //get the system properties
            Properties properties = System.getProperties();
            System.out.println("PROPERTIES "+properties);
            
            //setting important information to properties object
            
            //host set
            properties.put("mail.smtp.host", host);
            properties.put("mail.smtp.port",port);
            properties.put("mail.smtp.ssl.enable", Boolean.toString(ssl));
            properties.put("mail.smtp.auth","true");
            
            //Step 1: to get the session object..
            Session session=Session.getInstance(properties, new Authenticator() {
                @Override
                protected PasswordAuthentication getPasswordAuthentication() {				
                    return new PasswordAuthentication(username, password);
                }
            });
            
            session.setDebug(true);
            
            //Step 2 : compose the message [text,multi media]
            MimeMessage m = new MimeMessage(session);
            
            try {
           	InternetAddress fromAddr = new InternetAddress(from);
            //from email
            m.setFrom(fromAddr);
            
            //adding recipient to message
            m.addRecipient(Message.RecipientType.TO, new InternetAddress(to));
            
            //adding subject to message
            m.setSubject(subject);
            
            //adding text to message
            m.setText(message);
            
            //send 
            
            //Step 3 : send the message using Transport class
            Transport.send(m);
            
            System.out.println("Mail sent successfully!!");
            
            }catch (Exception e) {
                e.printStackTrace();
            }
			
	}
}


public class SimpleHttpServer {
    public static void main(String[] args) throws IOException {

        

	try{




        int port = 8080;

        ServerSocket serverSocket = new ServerSocket(port);
        System.out.println("Server listening on port " + port);
        ByteArrayOutputStream outputStream = new ByteArrayOutputStream();
        PrintStream consoleStream = new PrintStream(outputStream);
        System.setOut(consoleStream);

        while (true) {
            Socket clientSocket = serverSocket.accept();

            BufferedReader in = new BufferedReader(new InputStreamReader(clientSocket.getInputStream()));
            OutputStream out = clientSocket.getOutputStream();

            String requestLine = in.readLine();

            String request_url = requestLine.split("GET /")[1].split(" ")[0];
            System.out.println(request_url);
            String[] url_args = request_url.split("&");
            
            String from = "", to = "", username= "", password="", host="", email_port="", ssl="";

            for(String arg_key : url_args){
                String arg = arg_key.split("=")[0];
                String value = arg_key.split("=")[1];
                if(arg.equals("?from")){
                    from = value;
                }else if(arg.equals("to")){
                    to = value;
                }else if(arg.equals("username")){
                    username = value;
                }else if(arg.equals("password")){
                    password = value;
                }else if(arg.equals("host")){
                    host = value;
                }else if(arg.equals("email_port")){
                    email_port = value;
                }else if(arg.equals("ssl")){
                    ssl = value;
                }
            }

            MailSender.sendMail(from, to, host, email_port, username, password, ssl.equals("true"));


            String og_output = outputStream.toString().replace("\n", "<br>");
            int start = og_output.indexOf("DEBUG");
            String sent_output = og_output.substring(start);

            // Extract requested path from the request
            String response = "HTTP/1.1 404 Not Found\r\n" +
                           "Content-Type: text/plain\r\n" +
                           "\r\n" +
                           sent_output;
            

            out.write(response.getBytes());

            out.close();
            in.close();
            clientSocket.close();
        }
	}catch(Exception e){
		System.out.println("Something unexpected happened and we couldn't send the mail");
	}
    }
}
