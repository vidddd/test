import { Component, OnInit } from '@angular/core';
import { NgForm } from "@angular/forms";
import { Heroe } from "../../interfaces/heroe.interface";
import { HeroesService } from '../../services/heroes.service';
import { Router, ActivatedRoute, Params } from '@angular/router';

@Component({
  selector: 'app-heroe',
  templateUrl: './heroe.component.html',
  styles: []
})

export class HeroeComponent implements OnInit {

  private heroe:Heroe = {
    nombre:"",
    bio: "",
    casa: "Marvel"
  }

  nuevo:boolean = false;
  id:string;

  constructor(private _heroesService: HeroesService,
              private router:Router,
              private route:ActivatedRoute ) {

        this.route.params.subscribe(parametros => {
                this.id = parametros['id'];
                if(this.id != 'nuevo') {
                  this._heroesService.getHeroe(this.id)
                    .subscribe( heroe => this.heroe = heroe )
                }
        });
   }

  ngOnInit() {

  }

  guardar(){


  if(this.id == "nuevo") {
      this._heroesService.nuevoHeroe( this.heroe )
          .subscribe( data => {
               this.router.navigate(['/heroe',data.name])
          },
          error => console.error(error)
         );

   } else {
     console.log(this.id);
     this._heroesService.editarHeroe( this.heroe, this.id )
         .subscribe( data => {
              this.router.navigate(['/heroes'])
         },
         error => console.error(error)
        );

   }

  }


}
