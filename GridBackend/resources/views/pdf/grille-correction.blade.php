<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <style>
        @page {
            size: A4;
            margin: 15mm 12mm 15mm 12mm;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "DejaVu Sans", Arial, sans-serif;
            font-size: 10pt;
            color: #1a1a2e;
            background: #ffffff;
            line-height: 1.4;
        }

        /* ── En-tête ────────────────────────────────────────────────────── */
        .entete {
            border-bottom: 2px solid #1e3a5f;
            padding-bottom: 10px;
            margin-bottom: 14px;
            display: flex; /* DomPDF supporte flex basique */
        }

        .entete-gauche {
            flex: 1;
        }

        .entete-droite {
            text-align: right;
        }

        .app-name {
            font-size: 8pt;
            color: #6b7280;
            margin-bottom: 3px;
        }

        .eval-titre {
            font-size: 16pt;
            font-weight: 700;
            color: #1e3a5f;
        }

        .eval-meta {
            font-size: 9pt;
            color: #6b7280;
            margin-top: 2px;
        }

        .etudiant-nom {
            font-size: 13pt;
            font-weight: 700;
            color: #1a1a2e;
        }

        .etudiant-no {
            font-size: 9pt;
            color: #6b7280;
            margin-top: 2px;
        }

        .note-globale {
            font-size: 12pt;
            font-weight: 700;
            margin-top: 6px;
        }

        .note-succes { color: #059669; }
        .note-echec  { color: #dc2626; }

        /* ── Carte critère ──────────────────────────────────────────────── */
        .critere-bloc {
            border: 1px solid #d1d5db;
            border-radius: 8px;
            margin-bottom: 10px;
            overflow: hidden;
            page-break-inside: avoid;
        }

        .critere-entete {
            background: #f0f4f8;
            padding: 7px 12px;
            border-bottom: 1px solid #d1d5db;
            display: flex;
        }

        .critere-titre {
            font-size: 11pt;
            font-weight: 700;
            color: #1e3a5f;
            flex: 1;
        }

        .critere-pts {
            font-size: 10pt;
            font-weight: 600;
            color: #4b5563;
        }

        .critere-pts-succes { color: #059669; }
        .critere-pts-echec  { color: #dc2626; }

        /* ── Niveaux ────────────────────────────────────────────────────── */
        .niveaux-grille {
            display: flex;
            padding: 10px 12px;
            gap: 6px;
        }

        .niveau-carte {
            flex: 1;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 7px 8px;
            background: #f9fafb;
        }

        .niveau-carte.selectionne {
            border: 2px solid #1e3a5f;
            background: #1e3a5f;
        }

        .niveau-label {
            font-size: 9pt;
            font-weight: 700;
            color: #1a1a2e;
            display: block;
        }

        .niveau-carte.selectionne .niveau-label {
            color: #ffffff;
        }

        .niveau-description {
            font-size: 7.5pt;
            color: #6b7280;
            margin-top: 2px;
            display: block;
        }

        .niveau-carte.selectionne .niveau-description {
            color: rgba(255,255,255,0.75);
        }

        .niveau-pts {
            font-size: 8pt;
            font-weight: 700;
            color: #1e3a5f;
            margin-top: 4px;
            display: block;
        }

        .niveau-carte.selectionne .niveau-pts {
            color: rgba(255,255,255,0.9);
        }

        .niveau-check {
            font-size: 8pt;
            color: #ffffff;
            margin-right: 3px;
        }

        /* ── Points ajustés ─────────────────────────────────────────────── */
        .pts-ajustes {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            background: #f9fafb;
            border-top: 1px dashed #d1d5db;
            font-size: 8.5pt;
            color: #4b5563;
        }

        .pts-ajustes-valeur {
            font-weight: 700;
            color: #1e3a5f;
            font-size: 10pt;
        }

        .pts-modifie {
            color: #d97706;
            font-size: 7.5pt;
        }

        /* ── Commentaire critère ────────────────────────────────────────── */
        .commentaire-critere {
            margin: 0 12px 10px;
            padding: 6px 10px;
            background: #fefce8;
            border-left: 3px solid #d97706;
            border-radius: 0 4px 4px 0;
            font-size: 8.5pt;
            color: #374151;
            font-style: italic;
        }

        .commentaire-label {
            font-size: 7.5pt;
            font-weight: 700;
            color: #92400e;
            margin-bottom: 2px;
            display: block;
            font-style: normal;
        }

        /* ── Commentaire général ─────────────────────────────────────────── */
        .commentaire-general {
            border: 1px solid #bfdbfe;
            border-left: 4px solid #1e3a5f;
            border-radius: 6px;
            padding: 10px 12px;
            background: #eff6ff;
            margin-top: 10px;
            page-break-inside: avoid;
        }

        .commentaire-general-label {
            font-size: 9pt;
            font-weight: 700;
            color: #1e3a5f;
            margin-bottom: 5px;
            display: block;
        }

        .commentaire-general-texte {
            font-size: 9pt;
            color: #374151;
            line-height: 1.5;
        }

        /* ── Résumé final ───────────────────────────────────────────────── */
        .resume {
            border: 2px solid #1e3a5f;
            border-radius: 8px;
            padding: 10px 14px;
            background: #f0f4f8;
            margin-top: 12px;
            display: flex;
            page-break-inside: avoid;
        }

        .resume-label {
            font-size: 11pt;
            font-weight: 700;
            color: #1e3a5f;
            flex: 1;
        }

        .resume-note {
            font-size: 18pt;
            font-weight: 700;
            color: #1e3a5f;
            margin-right: 12px;
        }

        .resume-pct {
            font-size: 14pt;
            font-weight: 700;
        }

        /* ── Pied de page ───────────────────────────────────────────────── */
        .pied {
            margin-top: 10px;
            font-size: 7.5pt;
            color: #9ca3af;
            text-align: right;
            border-top: 1px solid #e5e7eb;
            padding-top: 5px;
        }
    </style>
</head>
<body>

{{-- En-tête --}}
<div class="entete">
    <div class="entete-gauche">
        <div class="app-name">Grid Magic</div>
        <div class="eval-titre">{{ $evaluation->titre }}</div>
        <div class="eval-meta">
            {{ $evaluation->cours->code }} — {{ $evaluation->cours->titre }}
            @if($evaluation->date)
                &nbsp;·&nbsp; {{ \Carbon\Carbon::parse($evaluation->date)->format('d F Y') }}
            @endif
        </div>
    </div>
    <div class="entete-droite">
        <div class="etudiant-nom">{{ $etudiant->nom }}, {{ $etudiant->prenom }}</div>
        <div class="etudiant-no">N° {{ $etudiant->no_etudiant }}</div>
        @php
            $pct = $pointsMax > 0 ? round(($totalPoints / $pointsMax) * 100) : 0;
        @endphp
        <div class="note-globale {{ $pct >= 60 ? 'note-succes' : 'note-echec' }}">
            {{ $totalPoints }} / {{ $pointsMax }} pts ({{ $pct }} %)
        </div>
    </div>
</div>

{{-- Critères --}}
@foreach($criteres as $critere)
    @php
        $resultat    = $resultats->firstWhere('critere_id', $critere->id);
        $niveaux     = $critere->niveaux;
        $ptsMax      = collect($niveaux)->max('points');
        $ptsObtenus  = $resultat?->points_obtenus ?? null;
        $niveauIdx   = $resultat?->niveau_index;
        $niveauPts   = $niveauIdx !== null ? $niveaux[$niveauIdx]['points'] : null;
        $ptsAjustes  = ($ptsObtenus !== null && $ptsObtenus != $niveauPts);
        $critPct     = $ptsMax > 0 && $ptsObtenus !== null
                         ? round(($ptsObtenus / $ptsMax) * 100)
                         : null;
    @endphp

    <div class="critere-bloc">

        {{-- En-tête du critère --}}
        <div class="critere-entete">
            <div class="critere-titre">{{ $critere->titre }}</div>
            @if($ptsObtenus !== null)
                <div class="critere-pts {{ $critPct >= 60 ? 'critere-pts-succes' : 'critere-pts-echec' }}">
                    {{ $ptsObtenus }} / {{ $ptsMax }} pts
                </div>
            @else
                <div class="critere-pts">— / {{ $ptsMax }} pts</div>
            @endif
        </div>

        {{-- Niveaux --}}
        <div class="niveaux-grille">
            @foreach($niveaux as $i => $niveau)
                @php $selected = ($niveauIdx === $i); @endphp
                <div class="niveau-carte {{ $selected ? 'selectionne' : '' }}">
                    @if($selected)
                        <span class="niveau-check">✓</span>
                    @endif
                    <span class="niveau-label">{{ $niveau['label'] }}</span>
                    @if(!empty($niveau['description']))
                        <span class="niveau-description">{{ $niveau['description'] }}</span>
                    @endif
                    <span class="niveau-pts">{{ $niveau['points'] }} pts</span>
                </div>
            @endforeach
        </div>

        {{-- Points ajustés --}}
        @if($ptsAjustes)
            <div class="pts-ajustes">
                <span>Points ajustés :</span>
                <span class="pts-ajustes-valeur">{{ $ptsObtenus }}</span>
                <span>/ {{ $ptsMax }} pts</span>
                <span class="pts-modifie">✎ modifié ({{ $niveauPts }} pts par défaut)</span>
            </div>
        @endif

        {{-- Commentaire --}}
        @if($resultat?->commentaire)
            <div class="commentaire-critere">
                <span class="commentaire-label">Commentaire</span>
                {!! nl2br(e($resultat->commentaire)) !!}
            </div>
        @endif

    </div>
@endforeach

{{-- Commentaire général --}}
@if($commentaire?->commentaire_general)
    <div class="commentaire-general">
        <span class="commentaire-general-label">💬 Commentaire général</span>
        <div class="commentaire-general-texte">
            {!! nl2br(e($commentaire->commentaire_general)) !!}
        </div>
    </div>
@endif

{{-- Résumé --}}
<div class="resume">
    <span class="resume-label">Résultat final</span>
    <span class="resume-note">{{ $totalPoints }} / {{ $pointsMax }}</span>
    <span class="resume-pct {{ $pct >= 60 ? 'note-succes' : 'note-echec' }}">
      {{ $pct }} %
    </span>
</div>

<div class="pied">
    Généré par Grid Magic — {{ now()->format('d/m/Y à H:i') }}
</div>

</body>
</html>
