@extends('admin.layout')

@section('title', 'Modifier le Membre - Admin')
@section('page-title', 'Modifier le Membre')

@section('content')
<div class="admin-team-edit">
    <div class="card">
        <div class="card-header">
            <h3>Modifier le Membre</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.team.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Nom *</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $member->name) }}" required>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="position">Poste *</label>
                    <input type="text" name="position" id="position" class="form-control" value="{{ old('position', $member->position) }}" required>
                    @error('position')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="bio">Biographie</label>
                    <textarea name="bio" id="bio" class="form-control" rows="4">{{ old('bio', $member->bio) }}</textarea>
                    @error('bio')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="photo">Photo</label>
                    @if($member->photo)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" width="100" style="border-radius: 5px;">
                    </div>
                    @endif
                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                    @error('photo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="order">Ordre d'affichage</label>
                            <input type="number" name="order" id="order" class="form-control" value="{{ old('order', $member->order) }}">
                            @error('order')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="is_active">Statut</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1" {{ old('is_active', $member->is_active) ? 'selected' : '' }}>Actif</option>
                                <option value="0" {{ !old('is_active', $member->is_active) ? 'selected' : '' }}>Inactif</option>
                            </select>
                            @error('is_active')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    <a href="{{ route('admin.team') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection