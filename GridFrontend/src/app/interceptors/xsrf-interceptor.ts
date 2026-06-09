import { HttpInterceptorFn } from '@angular/common/http';
import { inject } from '@angular/core';
import { CookieService } from 'ngx-cookie-service';

export const xsrfInterceptor: HttpInterceptorFn = (req, next) => {
  const cookieService: CookieService = inject(CookieService)
  const xsrfToken = cookieService.get('XSRF-TOKEN')
  
  // Si j'ai déjà un XSRF et que je ne suis pas en train de demander pour un XSRF
  if (xsrfToken && !req.url.includes('csrf-cookie')) {    
    const decodedToken = decodeURIComponent(xsrfToken)    
    const newRequest = req.clone(
      {setHeaders: {'X-XSRF-TOKEN': decodedToken}}
    );
    return next(newRequest);
  }
  else {
    return next(req);
  }
};
