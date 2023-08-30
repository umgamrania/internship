let a_record_table = document.querySelector(".A").querySelector('tbody');
let aaaa_record_table = document.querySelector(".AAAA").querySelector('tbody');
let mx_record_table = document.querySelector(".MX").querySelector('tbody');
let ns_record_table = document.querySelector(".NS").querySelector('tbody');
let cname_record_table = document.querySelector(".CNAME").querySelector('tbody');
let txt_record_table = document.querySelector(".TXT").querySelector('tbody');
let form = document.querySelector("#form");
let find_btn = document.querySelector("#find-btn");

form.onsubmit = e => {
    e.preventDefault();
    get_data();
}

let json_data
function get_data() {
    let all_dynamic_record = document.querySelectorAll(".dynamic-record");
    all_dynamic_record.forEach(record => {record.remove()});

    let url = document.querySelector("#url_input").value;
    if(url.length == 0){
        alert("Please enter domain name");
        return;
    }
    let dns = document.querySelector("#dns_input").value;

    find_btn.disabled = true;
    find_btn.innerText = "Finding records...";

    fetch(`get_data.php?url=${url}&dns=${dns}`).then(response => {
        return response.json() 
    }).then(data => {
        find_btn.disabled = false;
        find_btn.innerText = "Find Records";

        let cname_records = null;
        let a_records = null;
        let aaaa_records = null;
        let mx_records = null;
        let ns_records = null;
        let txt_records = null;

        a_records = data['A'];
        if(a_records)
            a_records = a_records.trim().split('\n');

        aaaa_records = data['AAAA'];
        if(aaaa_records)
            aaaa_records = aaaa_records.trim().split('\n');

        mx_records = data['MX'];
        if(mx_records)
            mx_records = mx_records.trim().split('\n');

        ns_records = data['NS'];
        if(ns_records)
            ns_records = ns_records.trim().split('\n');

        txt_records = data['TXT'];
        if(txt_records)
            txt_records = txt_records.trim().split('\n');

        console.log(ns_records);
        cname_records = data['CNAME']?.split('\n');

        console.log(data);
        if(a_records)
            for (let index = 0; index < a_records.length; index++) {
                const record = a_records[index];
                a_record_table.appendChild(get_row(index + 1, record));
            }
        else
            a_record_table.appendChild(get_row('-', 'No record found'))

        if(aaaa_records)
            for (let index = 0; index < aaaa_records.length; index++) {
                const record = aaaa_records[index];
                aaaa_record_table.appendChild(get_row(index + 1, record));
            }
        else
            aaaa_record_table.appendChild(get_row('-', 'No record found'))

        if(ns_records)
            for (let index = 0; index < ns_records.length; index++) {
                const record = ns_records[index];
                ns_record_table.appendChild(get_row(index + 1, record));
            }
        else
            ns_record_table.appendChild(get_row('-', 'No record found'))

        if(mx_records)
            for (let index = 0; index < mx_records.length; index++) {
                const record = mx_records[index];
                mx_record_table.appendChild(get_row(index + 1, record));
            }
        else
            mx_record_table.appendChild(get_row('-', 'No record found'))

        if(cname_records)
            for (let index = 0; index < cname_records.length; index++) {
                const record = cname_records[index];
                cname_record_table.appendChild(get_row(index + 1, record));
            }
        else
            cname_record_table.appendChild(get_row('-', 'No record found'))

        if(txt_records)
            for (let index = 0; index < txt_records.length; index++) {
                const record = txt_records[index];
                txt_record_table.appendChild(get_row(index + 1, record));
            }
        else
            txt_record_table.appendChild(get_row('-', 'No record found'))

        
    });
}
function get_row(id, text){
    let th = document.createElement("th");
    th.innerText = id;
    let td = document.createElement("td");
    td.innerText = text;

    let tr = document.createElement("tr");
    tr.className = "dynamic-record";
    tr.appendChild(th);
    tr.appendChild(td);

    return tr;
}

let location_parts = window.location.href.trim().split('/');
console.log(location_parts);
if(location_parts.length > 4){
    let url = location_parts[4].split("?")[1];
    if(url){
        url_input.value = url;
        get_data();
    }
}