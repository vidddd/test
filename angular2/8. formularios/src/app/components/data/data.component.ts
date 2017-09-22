import { Component } from '@angular/core';
import { FormGroup, FormControl, Validators } from '@angular/forms';

@Component({
  selector: 'app-data',
  templateUrl: './data.component.html',
  styles: []
})
export class DataComponent {

  forma:FormGroup;

  constructor() {
      this.forma = new FormGroup({
        'nombre': new FormControl('', [
                                      Validators.required,
                                      Validators.minLength(3)
                                     ]),
        'apellido': new FormControl('', Validators.required     ),
        'correo': new FormControl('', [
                      Validators.required, Validators.pattern("")]     ),

        'password1': new FormControl('', Validators.required ),
        'password2': new FormControl()
      });

      this.forma.controls['password2'].setValidators([
        Validators.required,
        this.noIgual.bind( this.forma )
      ])
  }

  noIgual( control: FormControl ): { [s:string]:boolean } {

      let forma:any = this;

      if(control.value !== this.controls['password1'].value ) {
        return {
          noiguales:true;
        }
      }
      return null;
  }

  guardarCambios(){
      console.log(this.forma);
  }
}
