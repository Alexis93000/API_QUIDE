import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import {HttpClientModule, HttpClientModule} from '@angular/common/http';
import { ListesProvider } from '../../providers/listes/listes';


@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})

export class HomePage {
  public allListe=[];
  constructor(public navCtrl: NavController,private listeProvider: ListesProvider) {

  }

  ionViewDidLoad(){
  
    this.listeProvider.getListe()
    	.subscribe(detail => this.allListe=detail);
  
  }

  

}
