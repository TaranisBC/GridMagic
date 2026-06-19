import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CarteCritere } from './carte-critere';

describe('CarteCritere', () => {
  let component: CarteCritere;
  let fixture: ComponentFixture<CarteCritere>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CarteCritere],
    }).compileComponents();

    fixture = TestBed.createComponent(CarteCritere);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
