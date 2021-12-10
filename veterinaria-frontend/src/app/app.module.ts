import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavegacionComponent } from './components/navegacion/navegacion.component';
import { LoginComponent } from './components/login/login.component';
import { CrearUsuarioComponent } from './components/crear-usuario/crear-usuario.component';
import { EditarMascotaComponent } from './components/mascotas/editar-mascota/editar-mascota.component';
import { FooterComponent } from './components/footer/footer.component';
import { ListarMascotasComponent } from './components/mascotas/listar-mascotas/listar-mascotas.component';
import { HttpClientModule } from '@angular/common/http';
@NgModule({
  declarations: [
    AppComponent,
    NavegacionComponent,
    LoginComponent,
    CrearUsuarioComponent,
    EditarMascotaComponent,
    FooterComponent,
    ListarMascotasComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
