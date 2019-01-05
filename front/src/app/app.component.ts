
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
  items = [];
  dataSource = new MatTableDataSource<Item>(this.items);

  @ViewChild(MatPaginator) paginator: MatPaginator;

  constructor(
    private apiService: ApiService
  ) { }

  ngOnInit() {
    this.apiService.getItems().subscribe( (items : Item[]) => {
      this.dataSource.data = items;
      this.dataSource.paginator = this.paginator;
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

