import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';
import 'rxjs/add/operator/map';

@Injectable()
export class SpotifyService {
  artistas:any[] = [];
  urlBusqueda:string = "https://api.spotify.com/v1/search";

  constructor( private http:Http) { }

  getArtistas( termino:string ) {

       let header = new Headers();
       header.append('authorization', ' ');

       let query = `q=${ termino }&type=artist`;
       let url = this.urlBusqueda + query;

       return this.http.get(url, { header })
              .map( res=>{
                  console.log(res);
              });
  }
}
