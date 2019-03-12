import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

/*
  Generated class for the ListesProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
const API:string="http://127.0.0.1/";
@Injectable()
export class ListesProvider {

  constructor(public http: HttpClient) {
    console.log('Hello ListesProvider Provider');
  }
  getListe(){
  return this.http.get(API);
  }

}
