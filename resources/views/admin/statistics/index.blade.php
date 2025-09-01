@extends('admin.layout')

@section('title', 'Gestion des Statistiques - Admin')
@section('page-title', 'Gestion des Statistiques')

@section('content')
<div class="admin-statistics">
    <div class="card">
        <div class="card-header">
            <div class="header-actions">
                <h3>Liste des Statistiques</h3>
                <a href="{{ route('admin.statistics.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nouvelle Statistique
                </a>
            </div>
        </div>
        <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Icône</th>
                            <th>Titre</th>
                            <th>Valeur</th>
                            <th>Ordre</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($statistics as $statistic)
                        <tr>
                            <td>{{ $statistic->id }}</td>
                            <td>
                                @if($statistic->icon)
                                <i class="{{ $statistic->icon }}"></i>
                                @else
                                <i class="fas fa-chart-bar"></i>
                                @endif
                            </td>
                            <td>{{ $statistic->title }}</td>
                            <td>{{ $statistic->value }}</td>
                            <td>{{ $statistic->order }}</td>
                            <td>
                                <span class="badge {{ $statistic->is_active ? 'badge-success' : 'badge-danger' }}">
                                    {{ $statistic->is_active ? 'Actif' : 'Inactif' }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.statistics.edit', $statistic->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.statistics.destroy', $statistic->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection