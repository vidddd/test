import { Component, OnInit } from '@angular/core';
import { SpotifyService } from '../../services/spotify.service';


@Component({
  selector: 'app-search',
  templateUrl: './search.component.html'
})
export class SearchComponent implements OnInit {

  termino:string = "";

  constructor( private _spotifyService:SpotifyService ) { }

  ngOnInit() {


  }

  buscarArtista(){
    // necesitamos subscribirnos para escuchar la respuesta del observable
    this._spotifyService.getArtistas(this.termino).subscribe(
      data =>{
      //  console.log(data);
      }
    );

  }

}
