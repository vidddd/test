import { Injectable } from '@angular/core';
import { Http, Headers } from '@angular/http';
import 'rxjs/add/operator/map';

@Injectable()
export class SpotifyService {
  artistas:any[] = [];
  urlBusqueda:string = "https://api.spotify.com/v1/search";
  urlArtista:string ="https://api.spotify.com/v1/artists";
  token:string = "BQAQqGhxOz76WU2WN7_SqVu5kjxP-eTM5RdNt7QzDhY0ZwHYXORrtZndIhfSBqjAhkErLcyIM0mDk5meSkRZWQ";


  constructor( private http:Http) { }

  getArtistas( termino:string ) {

       let headers = new Headers();
       headers.append('authorization', 'Bearer '+this.token);

       let query = `?q=${ termino }&type=artist`;
       let url = this.urlBusqueda + query;

       return this.http.get(url, { headers })
              .map( res=>{
                //  console.log();
                this.artistas = res.json().artists.items;
                return this.artistas;

              });
  }

  getArtista( id:string ) {

       let headers = new Headers();
       headers.append('Accept', 'application/json');
       headers.append('Authorization', 'Bearer '+this.token);

       let query = `/${ id }`;
       let url = this.urlArtista + query;

       return this.http.get(url, { headers })
              .map( res=>{

                return res.json();

              });
  }

  getToptracks( id:string ) {

       let headers = new Headers();
       headers.append('Accept', 'application/json');
       headers.append('Authorization', 'Bearer '+this.token);

       let query = `/${ id }/top-tracks?country=ES`;
       let url = this.urlArtista + query;

       return this.http.get(url, { headers })
              .map( res=>{
                return res.json();

              });
  }
}
