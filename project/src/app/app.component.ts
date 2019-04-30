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
  responsedata;

  years = ['2019', '2020', '2021', '2022', '2023'];
  regModel = new Reg('', '', '', '', '', '', '', '');

  constructor(private http: HttpClient) { }

  senddata(data) {
    console.log(data);

    let params = JSON.stringify(data);
    console.log('Params: ' + params);

    //this.http.get('http://localhost/cs4640s19/ngphp-get.php?str='+encodeURIComponent(params))
    this.http.get('http://localhost/WebApplications/ngphp-get.php?str=' + params)
    this.http.post('http://localhost/WebApplications/ngphp-post.php', data)
      .subscribe((data) => {
        console.log('Got data from backend', data);
        this.responsedata = data;
        console.log('hello');
      }, (error) => {
        console.log('Error', error);
      })
  }
}