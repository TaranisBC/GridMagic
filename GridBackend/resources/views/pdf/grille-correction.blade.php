<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <style>
    @page { margin: 15mm 12mm; }

    

    body {
      font-family: "DejaVu Sans", Arial, sans-serif;
      font-size: 10pt;
      color: #1a1a2e;
      background: #ffffff;
      line-height: 1.4;
    }

    /* ── En-tête ──────────────────────────────────────────────────── */
    .entete {
      border-bottom: 2px solid #1e3a5f;
      padding-bottom: 10px;
      margin-bottom: 14px;
    }
    .entete-table { width: 100%; }
    .app-name { font-size: 8pt; color: #6b7280; margin-bottom: 3px; }
    .eval-titre { font-size: 16pt; font-weight: 700; color: #1e3a5f; }
    .eval-meta { font-size: 9pt; color: #6b7280; margin-top: 2px; }
    .etudiant-nom { font-size: 13pt; font-weight: 700; color: #1a1a2e; text-align: right; }
    .etudiant-no { font-size: 9pt; color: #6b7280; margin-top: 2px; text-align: right; }
    .note-globale { font-size: 12pt; font-weight: 700; margin-top: 6px; text-align: right; }
    .note-succes { color: #059669; }
    .note-echec  { color: #dc2626; }

    /* ── Carte critère ────────────────────────────────────────────── */
    .critere-bloc {
      border: 1px solid #d1d5db;
      border-radius: 8px;
      margin-bottom: 10px;
      page-break-inside: avoid;
    }
    .critere-entete {
      background: #f0f4f8;
      padding: 7px 12px;
      border-bottom: 1px solid #d1d5db;
      border-radius: 8px 8px 0 0;
    }
    .critere-entete-table { width: 100%; }
    .critere-titre { font-size: 11pt; font-weight: 700; color: #1e3a5f; }
    .critere-pts { font-size: 10pt; font-weight: 600; color: #4b5563; text-align: right; }
    .critere-pts-succes { color: #059669; }
    .critere-pts-echec  { color: #dc2626; }

    /* ── Niveaux ──────────────────────────────────────────────────── */
    .niveaux-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 6px;
      padding: 6px;
    }
    .niveau-td {
      border: 1px solid #d1d5db;
      border-radius: 6px;
      padding: 7px 8px;
      background: #f9fafb;
      vertical-align: top;
      width: 25%;
    }
    .niveau-td.selectionne {
      border: 2px solid #1e3a5f;
      background: #1e3a5f;
    }
    .niveau-label { font-size: 9pt; font-weight: 700; color: #1a1a2e; display: block; }
    .niveau-td.selectionne .niveau-label { color: #ffffff; }
    .niveau-description { font-size: 7.5pt; color: #6b7280; margin-top: 2px; display: block; }
    .niveau-td.selectionne .niveau-description { color: rgba(255,255,255,0.8); }
    .niveau-pts { font-size: 8pt; font-weight: 700; color: #1e3a5f; margin-top: 4px; display: block; }
    .niveau-td.selectionne .niveau-pts { color: rgba(255,255,255,0.9); }
    .niveau-check { font-weight: 700; color: #ffffff; margin-right: 2px; }

    /* ── Points ajustés ───────────────────────────────────────────── */
    .pts-ajustes {
      padding: 5px 12px;
      background: #fffbeb;
      border-top: 1px dashed #d1d5db;
      font-size: 8.5pt;
      color: #4b5563;
    }
    .pts-ajustes-valeur { font-weight: 700; color: #1e3a5f; }
    .pts-modifie { color: #d97706; }

    /* ── Commentaire critère ──────────────────────────────────────── */
    .commentaire-critere {
      margin: 0 10px 10px;
      padding: 6px 10px;
      background: #fefce8;
      border-left: 3px solid #d97706;
      border-radius: 0 4px 4px 0;
      font-size: 8.5pt;
      color: #374151;
      font-style: italic;
    }
    .commentaire-label {
      font-size: 7.5pt; font-weight: 700; color: #92400e;
      margin-bottom: 3px; display: block; font-style: normal;
    }

    /* ── Commentaire général ──────────────────────────────────────── */
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
      font-size: 9pt; font-weight: 700; color: #1e3a5f;
      margin-bottom: 5px; display: block;
    }
    .commentaire-general-texte { font-size: 9pt; color: #374151; line-height: 1.5; }

    /* ── Résumé final ─────────────────────────────────────────────── */
    .resume {
      border: 2px solid #1e3a5f;
      border-radius: 8px;
      padding: 10px 14px;
      background: #f0f4f8;
      margin-top: 12px;
      page-break-inside: avoid;
    }
    .resume-table { width: 100%; }
    .resume-label { font-size: 11pt; font-weight: 700; color: #1e3a5f; }
    .resume-note { font-size: 18pt; font-weight: 700; color: #1e3a5f; text-align: right; }
    .resume-pct { font-size: 14pt; font-weight: 700; text-align: right; padding-left: 12px; }

    /* ── Pied de page ─────────────────────────────────────────────── */
    .pied {
      margin-top: 10px; font-size: 7.5pt; color: #9ca3af;
      text-align: right; border-top: 1px solid #e5e7eb; padding-top: 5px;
    }
  </style>
</head>
<body>

{{-- En-tête --}}
<div class="entete">
        <table class="entete-table">
          <tr>
            <td style="vertical-align:top;">
              <div class="app-name">Grid Magic</div>
              <div class="eval-titre">{{ $evaluation->titre }}</div>
              <div class="eval-meta">
                {{ $evaluation->cours->code }} — {{ $evaluation->cours->titre }}
                @if($evaluation->date)
                  &nbsp;·&nbsp; {{ \Carbon\Carbon::parse($evaluation->date)->format('d F Y') }}
                @endif
              </div>
            </td>
            <td style="vertical-align:top; text-align:right;">
              <div class="etudiant-nom">{{ $etudiant->nom }}, {{ $etudiant->prenom }}</div>
              <div class="etudiant-no">N° {{ $etudiant->no_etudiant }}</div>
              @php
                $pct = $pointsMax > 0 ? round(($totalPoints / $pointsMax) * 100, 1) : 0;
              @endphp
              <div class="note-globale {{ $pct >= 60 ? 'note-succes' : 'note-echec' }}">
                {{ $totalPoints }} / {{ $pointsMax }} pts ({{ $pct }} %)
              </div>
            </td>
          </tr>
        </table>
      </div>

{{-- Critères --}}
@foreach($criteres as $critere)
        @php
          $resultat   = $resultats->firstWhere('critere_id', $critere->id);
          $niveaux    = $critere->niveaux;
          $ptsMax     = collect($niveaux)->max('points');
          $ptsObtenus = $resultat?->points_obtenus ?? null;
          $niveauIdx  = $resultat?->niveau_index ?? null;
          $niveauPts  = $niveauIdx !== null ? $niveaux[$niveauIdx]['points'] : null;
          $ptsAjustes = ($ptsObtenus !== null && $niveauPts !== null && $ptsObtenus != $niveauPts);
          $critPct    = ($ptsMax > 0 && $ptsObtenus !== null)
                          ? round(($ptsObtenus / $ptsMax) * 100)
                          : null;
        @endphp

        <div class="critere-bloc">

          <div class="critere-entete">
            <table class="critere-entete-table">
              <tr>
                <td class="critere-titre">{{ $critere->titre }}</td>
                <td class="critere-pts {{ $critPct !== null ? ($critPct >= 60 ? 'critere-pts-succes' : 'critere-pts-echec') : '' }}">
                  @if($ptsObtenus !== null)
                    {{ $ptsObtenus }} / {{ $ptsMax }} pts
                  @else
                    — / {{ $ptsMax }} pts
                  @endif
                </td>
              </tr>
            </table>
          </div>

          <table class="niveaux-table">
            <tr>
        @foreach($niveaux as $i => $niveau)
                @php $selected = ($niveauIdx !== null && $niveauIdx == $i); @endphp
                <td class="niveau-td {{ $selected ? 'selectionne' : '' }}">
                  @if($selected)<span class="niveau-check">✓ </span>@endif
                  <span class="niveau-label">{{ $niveau['label'] }}</span>
                  @if(!empty($niveau['description']))
                    <span class="niveau-description">{{ $niveau['description'] }}</span>
                  @endif
                  <span class="niveau-pts">{{ $niveau['points'] }} pts</span>
                </td>
        @endforeach
            </tr>
          </table>

          @if($ptsAjustes)
            <div class="pts-ajustes">
              Points ajustés : <span class="pts-ajustes-valeur">{{ $ptsObtenus }}</span>
              / {{ $ptsMax }} pts
              <span class="pts-modifie"> ✎ modifié ({{ $niveauPts }} pts par défaut)</span>
            </div>
          @endif

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
          <span class="commentaire-general-label">Commentaire général</span>
          <div class="commentaire-general-texte">
            {!! nl2br(e($commentaire->commentaire_general)) !!}
          </div>
        </div>
@endif

{{-- Résumé final --}}
<div class="resume">
        <table class="resume-table">
          <tr>
            <td class="resume-label">Résultat final</td>
            <td class="resume-note">{{ $totalPoints }} / {{ $pointsMax }}</td>
            <td class="resume-pct {{ $pct >= 60 ? 'note-succes' : 'note-echec' }}">
              {{ $pct }} %
            </td>
          </tr>
        </table>
      </div>

<div class="pied">
        Généré par Grid Magic — {{ now()->format('d/m/Y à H:i') }}
      </div>

</body>
</html>