
import {Component, OnInit, ViewChild} from '@angular/core';
import {MatPaginator, MatTableDataSource} from '@angular/material';
import { ApiService } from './services/api.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.sass']
})

export class AppComponent implements OnInit {
  displayedColumns: string[] = ['id', 'annonceId', 'siren', 'commentaires', 'mandataire', 'nic'];
  dataSource = new MatTableDataSource<Item>([]);
  items = [];

  @ViewChild(MatPaginator) paginator: MatPaginator;

  constructor(
    private apiService: ApiService
  ) { }

  ngOnInit() {
    this.apiService.getItems().subscribe( (items : Item[]) => {
      this.items = items;
      this.dataSource = new MatTableDataSource<Item>(items);
      console.log(this.dataSource);
    });
    
  }
}

export interface Item {
  id: number;
  annonceId: number;
  commentaires: string;
  dep: number;
  nic: number;
  siren: number;
  mandataire: string;
}

