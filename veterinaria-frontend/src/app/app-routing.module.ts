import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { LoginComponent } from '../app/components/login/login.component'
import { PrincipalComponent } from '../app/components/principal/principal.component'
import { DashboardComponent } from '../app/components/dashboard/dashboard.component'
import { ListarMascotasComponent } from './components/mascotas/listar-mascotas/listar-mascotas.component';
import { EditarMascotaComponent } from './components/mascotas/editar-mascota/editar-mascota.component';
import { CrearUsuarioComponent } from './components/crear-usuario/crear-usuario.component';
const routes: Routes = [
  {
    path: '',
    component: LoginComponent
  },
  {
    path: 'inicio', 
    component: PrincipalComponent
  },
  {
    path: 'dashboard', 
    component: DashboardComponent
  },
  {
    path: 'mascotas', 
    component: ListarMascotasComponent
  },
  {
    path: 'registro_usuario', 
    component: CrearUsuarioComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
