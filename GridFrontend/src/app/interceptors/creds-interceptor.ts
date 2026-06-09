import { HttpInterceptorFn } from '@angular/common/http';

/**
 * Intercepteur qui permet d'envoyer les cookies d'identification avec les requêtes http
 * @param req la requête initiale
 * @param next la prochaine étape de la requête
 * @returns 
 */
export const credsInterceptor: HttpInterceptorFn = (req, next) => {
  const clonedRequest = req.clone({withCredentials: true});
  return next(clonedRequest);
};
