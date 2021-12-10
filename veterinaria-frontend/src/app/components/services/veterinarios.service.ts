import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Veterinario } from '../models/Veterinario';
import { Login } from '../models/Login';


@Injectable({
  providedIn: 'root'
})
export class VeterinariosService {

  API_URI = 'http://localhost/proyecto-veterinaria/veterinaria-backend'

  options = {
    observe: "response" as 'body', // to display the full response & as 'body' for type cast
    responseType: "json"
  };


  constructor(private http: HttpClient) { }

  getVeterinarios() {
    return this.http.get(`${this.API_URI}/veterinarios/listarVeterinarios.php`)
  }

  saveVeterinario(veterinario: Veterinario): Observable<Veterinario> { 
    return this.http.post<Veterinario>(`${this.API_URI}/veterinarios/crearVeterinario.php`, veterinario)
  }

 
  loginUsuario(login: Login): Observable<Login> { 
    return this.http.post<Login>(`${this.API_URI}/admin/login.php`, login, {
      observe: "response" as 'body',
      responseType: "json"
    })
  }

}
