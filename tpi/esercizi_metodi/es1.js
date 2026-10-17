const eventi = [
  { id: 1, titolo: "Torneo di robotica", categoria: "Tecnologia", costo: 12, posti: 24, iscritti: 18, attivo: true },
  { id: 2, titolo: "Laboratorio di fotografia", categoria: "Arte", costo: 8, posti: 15, iscritti: 15, attivo: true },
  { id: 3, titolo: "Visita al museo della scienza", categoria: "Scienze", costo: 20, posti: 30, iscritti: 21, attivo: true },
  { id: 4, titolo: "Corso di primo soccorso", categoria: "Formazione", costo: 0, posti: 20, iscritti: 12, attivo: false },
  { id: 5, titolo: "Hackathon scolastico", categoria: "Tecnologia", costo: 5, posti: 40, iscritti: 35, attivo: true },
  { id: 6, titolo: "Teatro serale", categoria: "Cultura", costo: 15, posti: 25, iscritti: 9, attivo: true }
];

const postiLiberi = (evento) => evento.posti - evento.iscritti;

eventi.forEach((evento) => {
  console.log(`${evento.titolo} | posti liberi: ${postiLiberi(evento)}`);
});

console.log(`\nNumero di eventi: ${eventi.length}`);
console.log("Proprietà del primo evento (verifica che non sia stato modificato):", Object.keys(eventi[0]));
