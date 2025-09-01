@extends('admin.layout')

@section('title', 'Détail du Message - Admin')
@section('page-title', 'Détail du Message')

@section('content')
<div class="admin-contact-show">
    <div class="card">
        <div class="card-header">
            <h3>Message de {{ $request->name }}</h3>
        </div>
        <div class="card-body">
            <div class="message-details">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="detail-item">
                            <strong>Nom:</strong> {{ $request->name }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-item">
                            <strong>Email:</strong> <a href="mailto:{{ $request->email }}">{{ $request->email }}</a>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="detail-item">
                            <strong>Téléphone:</strong> {{ $request->phone ?? 'Non renseigné' }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-item">
                            <strong>Date:</strong> {{ $request->created_at->format('d/m/Y à H:i') }}
                        </div>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="detail-item">
                            <strong>Sujet:</strong> {{ $request->subject }}
                        </div>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="detail-item">
                            <strong>Message:</strong>
                            <div class="message-content" style="background: #f8f9fa; padding: 20px; border-radius: 5px; margin-top: 10px;">
                                {{ $request->message }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-actions">
                <a href="{{ route('admin.contact') }}" class="btn btn-secondary">Retour à la liste</a>
                <form action="{{ route('admin.contact.destroy', $request->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce message?')">
                        <i class="fas fa-trash"></i> Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection