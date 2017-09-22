import { Component } from '@angular/core';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-template',
  templateUrl: './template.component.html',
  styles: [`
    .ng-invalid.ng-touched:not(form) {
       border:1px solid red;
    }
  `]
})
export class TemplateComponent  {

  usuario:Object = {
     nombre: null,
     apellido: null,
     correo: null,
     pais: null,
     sexo: "Hombre",
     acepta: false
  }

  paises = [{
    codigo: "CRI",
    pais: "Costa Rica"
  },
  {
    codigo: "ES",
    pais: "España"
  }]

  constructor() { }

  guardar(forma:NgForm){
    console.log("guardando");
    console.log(forma.value);
    console.log(this.usuario);
  }
}
