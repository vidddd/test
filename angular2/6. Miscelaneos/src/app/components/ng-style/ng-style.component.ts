import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-ng-style',
  template: `

    <p [ngStyle]="{ 'font-size': tamano + 'px' }"> Hola Mundo..... esta es una etiqueta {{ tamano }}px</p>

    <p [style.fontSize]="'40px'"> Hola Mundo..... esta es una etiqueta 40 px</p>

    <p [style.fontSize.size]="'tamano'"> Hola Mundo..... esta es una etiqueta 20 px</p>

    <button class="btn btn-primary" (click)="tamano = tamano + 5"> <i class="fa fa-plus"></i>
    </button>
    <button class="btn btn-primary" (click)="tamano = tamano - 5"> <i class="fa fa-minus"></i>
    </button>
  `,
  styleUrls: []
})
export class NgStyleComponent implements OnInit {

  tamano:number = 30;

  constructor() { }

  ngOnInit() {
  }

}
