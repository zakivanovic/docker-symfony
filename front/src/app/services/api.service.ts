import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  constructor(
  	private http: HttpClient
  ) { }

  getItems() {
  	return this.http.get('/api/annonces-with-mandataire');
  }
}
