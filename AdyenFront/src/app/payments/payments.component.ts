import { Component, OnInit } from '@angular/core';
import { PaiementService } from '../services/paiement.service';
import { Paiement } from '../pay-methods';

@Component({
  selector: 'app-payments',
  templateUrl: './payments.component.html',
  styleUrls: ['./payments.component.css']
})
export class PaymentsComponent implements OnInit {

   public paiements:any  = [];
   public paymentMethodsResponse
  constructor(private _payService : PaiementService) { }

  ngOnInit(): void {

    debugger
     this._payService.getPaymentMethods() 
     .subscribe(data => this.paiements =  data ) 
    //.subscribe(data => console.log(data)) 
    //console.log( this.paiements.groups[0])
      //this.paiements = this.paiements;
      
      
     
  }// End Init 

  

} // End PayementComponenent
