import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Paiement } from '../pay-methods';
//import 'rxjs/add/operator/map';
//import 'rxjs/add/operator/catch';
//import  'rxjs/add/observable/throw'
@Injectable({
  providedIn: 'root'
})
export class PaiementService {


  constructor(private http : HttpClient) { }
  //private _url : string ='https://jsonplaceholder.typicode.com/users';
  _url : any ='http://127.0.0.1:8000/api/pay';
  getPaymentMethods(): Observable<Paiement[]>{
    return this.http.get<Paiement[]>(this._url)
    //.map((response:any) => response.json())
           // .pipe(map())
  }

  errorHandler(error : HttpErrorResponse){
        return Observable.throw(error.message || "server error")
  }
  
}
