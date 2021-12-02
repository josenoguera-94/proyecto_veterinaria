import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavegacionComponent } from './components/navegacion/navegacion.component';
import { LoginComponent } from './components/login/login.component';
import { DashboardComponent } from './components/dashboard/dashboard.component';
import { MascotasComponent } from './components/mascotas/mascotas.component';
import { CrearUsuarioComponent } from './components/crear-usuario/crear-usuario.component';
import { EditarMascotaComponent } from './components/editar-mascota/editar-mascota.component';

@NgModule({
  declarations: [
    AppComponent,
    NavegacionComponent,
    LoginComponent,
    DashboardComponent,
    MascotasComponent,
    CrearUsuarioComponent,
    EditarMascotaComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
