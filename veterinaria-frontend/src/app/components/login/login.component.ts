import { Component, OnInit } from '@angular/core';
import { VeterinariosService } from '../services/veterinarios.service';
import { ActivatedRoute,Router } from '@angular/router';
import { HttpClient, HttpHeaders, HttpResponse } from '@angular/common/http'
@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  login: any = {
    correo: '',
    contrasena: ''
  };

  constructor(
    private veterinarioService: VeterinariosService,
    private router: Router,
    private activedRoute: ActivatedRoute
  ) { }

  ngOnInit(): void {
  }

  loginUsuario() {

    console.log(this.login)
    this.veterinarioService.loginUsuario(this.login).subscribe(
      (response) => {                          
        console.log('response received')
        console.log(response)
        // this.router.navigate(['/games']);
      },
      (error) => {                            
        console.error(error)
      }
      )
    }

}
