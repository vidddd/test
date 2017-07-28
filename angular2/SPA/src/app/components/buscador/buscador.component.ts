import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { HeroesService } from '../../services/heroes.service';

@Component({
  selector: 'app-buscador',
  templateUrl: './buscador.component.html'
})
export class BuscadorComponent implements OnInit {

  heroes:any[] = []
  termino:string;

    constructor( private activatedRoute:ActivatedRoute, private _heroesService:HeroesService ) {
  }

  ngOnInit() {
      this.activatedRoute.params.subscribe( params => {
        //console.log("000"+ params['term'] );
         this.termino = params['term'];
         this.heroes = this._heroesService.buscarHeroes( params['term']);
        // console.log("222"+ this.heroes);
      }      )
  }

}
