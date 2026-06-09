import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CoursCarte } from './cours-carte';

describe('CoursCarte', () => {
  let component: CoursCarte;
  let fixture: ComponentFixture<CoursCarte>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [CoursCarte],
    }).compileComponents();

    fixture = TestBed.createComponent(CoursCarte);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
