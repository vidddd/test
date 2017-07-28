import { Pipe, PipeTransform } from '@angular/core';

@Pipe({
  name: 'contrasena'
})
export class ContrasenaPipe implements PipeTransform {
                                                      // devuelve string
  transform(value: string, activar: boolean = true ): string {
      if(activar) {
        let salida:string = "";
        return "*****************";
      } else {
        return value;
      }
  }

}
