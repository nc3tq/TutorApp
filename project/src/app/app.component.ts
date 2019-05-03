// <!-- Neha Chopra (nc3tq) -->

// This defines code for angular it has the variables that is used for the years ad dropdowns
// and it also creates a new instance of the contructor. 
import { Component } from '@angular/core';
import { Reg } from './reg';

import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Registration';


  // let's create a property to store a response from the back end
  // and try binding it back to the view
  responsedata = new Reg('', '', '', false, '', '', '','','');

  years = ['2019', '2020', '2021', '2022', '2023'];
  regModel = new Reg('', '', '', false, '', '', '','','');
  color = 'black';


  constructor(private http: HttpClient) { }
// This attempts to send data to the server and parses the json data. It also tries
// to get to the post and get files to access the php 
  senddata(data) {
    console.log(data);

    let params = JSON.stringify(data);
    console.log('Params: ' + params);

    //this.http.get('http://localhost/cs4640s19/ngphp-get.php?str='+encodeURIComponent(params))
    this.http.get<Reg>('http://localhost/WebApplications/ngphp-get.php?str=' + params)
    this.http.post<Reg>('http://localhost/WebApplications/ngphp-post.php', data)
      .subscribe((data) => {
        console.log('Got data from backend', data);
        this.responsedata = data[0];
        console.log('hello');
      }, (error) => {
        console.log('Error', error);
      })
  }
}