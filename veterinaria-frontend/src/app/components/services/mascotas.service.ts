import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Mascota } from '../models/Mascota';

@Injectable({
  providedIn: 'root'
})
export class MascotasService {

  API_URI = 'http://localhost/proyecto-veterinaria/veterinaria-backend'

  constructor(private http: HttpClient) { }

  getMascotas() {
    return this.http.get(`${this.API_URI}/mascotas/listarMascotas.php`)
  }

  getMascota(id: string | number) {
    return this.http.get(`${this.API_URI}/mascotas/listarMascota.php?id=${id}`)
  }

  saveMascota(mascota: Mascota): Observable<Mascota> { 
    return this.http.post<Mascota>(`${this.API_URI}/mascotas/crearMascota.php`, mascota)

  }

  updateGame(id: string | number, updateMascota: Mascota) {
    return this.http.put(`${this.API_URI}/mascotas/editarMascota.php?id=${id}`, updateMascota);
  }
  
  deleteGame(id: string){
    return this.http.delete(`${this.API_URI}/mascotas/eliminarMascota.php?id=${id}`)
  }

}
