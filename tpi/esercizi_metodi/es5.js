const eventi = [
  { id: 1, titolo: "Torneo di robotica", categoria: "Tecnologia", costo: 12, posti: 24, iscritti: 18, attivo: true },
  { id: 2, titolo: "Laboratorio di fotografia", categoria: "Arte", costo: 8, posti: 15, iscritti: 15, attivo: true },
  { id: 3, titolo: "Visita al museo della scienza", categoria: "Scienze", costo: 20, posti: 30, iscritti: 21, attivo: true },
  { id: 4, titolo: "Corso di primo soccorso", categoria: "Formazione", costo: 0, posti: 20, iscritti: 12, attivo: false },
  { id: 5, titolo: "Hackathon scolastico", categoria: "Tecnologia", costo: 5, posti: 40, iscritti: 35, attivo: true },
  { id: 6, titolo: "Teatro serale", categoria: "Cultura", costo: 15, posti: 25, iscritti: 9, attivo: true }
];

const postiLiberi = (evento) => evento.posti - evento.iscritti;

const totaleIscrittiAttivi = eventi.reduce(
  (accumulatore, evento) => (evento.attivo ? accumulatore + evento.iscritti : accumulatore),
  0
);

const incassoPrevisto = eventi.reduce(
  (accumulatore, evento) => (evento.attivo ? accumulatore + evento.costo * evento.iscritti : accumulatore),
  0
);

console.log(`Il numero totale di iscritti agli eventi attivi è ${totaleIscrittiAttivi}.`);
console.log(`L'incasso previsto dagli eventi attivi è ${incassoPrevisto} euro.`);
