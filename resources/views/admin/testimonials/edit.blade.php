@extends('admin.layout')

@section('title', 'Modifier le Témoignage - Admin')
@section('page-title', 'Modifier le Témoignage')

@section('content')
<div class="admin-testimonial-edit">
    <div class="card">
        <div class="card-header">
            <h3>Modifier le Témoignage</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="client_name">Nom du client *</label>
                    <input type="text" name="client_name" id="client_name" class="form-control" value="{{ old('client_name', $testimonial->client_name) }}" required>
                    @error('client_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="client_position">Poste du client</label>
                    <input type="text" name="client_position" id="client_position" class="form-control" value="{{ old('client_position', $testimonial->client_position) }}">
                    @error('client_position')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="content">Témoignage *</label>
                    <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $testimonial->content) }}</textarea>
                    @error('content')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="rating">Note *</label>
                    <select name="rating" id="rating" class="form-control" required>
                        <option value="">Sélectionnez une note</option>
                        <option value="1" {{ old('rating', $testimonial->rating) == 1 ? 'selected' : '' }}>1 étoile</option>
                        <option value="2" {{ old('rating', $testimonial->rating) == 2 ? 'selected' : '' }}>2 étoiles</option>
                        <option value="3" {{ old('rating', $testimonial->rating) == 3 ? 'selected' : '' }}>3 étoiles</option>
                        <option value="4" {{ old('rating', $testimonial->rating) == 4 ? 'selected' : '' }}>4 étoiles</option>
                        <option value="5" {{ old('rating', $testimonial->rating) == 5 ? 'selected' : '' }}>5 étoiles</option>
                    </select>
                    @error('rating')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="is_active">Statut</label>
                    <select name="is_active" id="is_active" class="form-control">
                        <option value="1" {{ old('is_active', $testimonial->is_active) ? 'selected' : '' }}>Actif</option>
                        <option value="0" {{ !old('is_active', $testimonial->is_active) ? 'selected' : '' }}>Inactif</option>
                    </select>
                    @error('is_active')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('admin.testimonials') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection