import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-buscador',
  templateUrl: './buscador.component.html'
})
export class BuscadorComponent implements OnInit {

  constructor( private activatedRoute:ActivatedRoute ) {

  }

  ngOnInit() {
      this.activatedRoute.params.subscribe( params => {
         console.log(params['termino']);
      }      )
  }

}
