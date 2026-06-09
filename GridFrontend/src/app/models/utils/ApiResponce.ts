export interface ApiResponse<Type> {
  data?: Type,
  error? : {
    code : number,
    message : string
  }
}