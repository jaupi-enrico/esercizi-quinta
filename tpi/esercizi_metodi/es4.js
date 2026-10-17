const eventi = [
  { id: 1, titolo: "Torneo di robotica", categoria: "Tecnologia", costo: 12, posti: 24, iscritti: 18, attivo: true },
  { id: 2, titolo: "Laboratorio di fotografia", categoria: "Arte", costo: 8, posti: 15, iscritti: 15, attivo: true },
  { id: 3, titolo: "Visita al museo della scienza", categoria: "Scienze", costo: 20, posti: 30, iscritti: 21, attivo: true },
  { id: 4, titolo: "Corso di primo soccorso", categoria: "Formazione", costo: 0, posti: 20, iscritti: 12, attivo: false },
  { id: 5, titolo: "Hackathon scolastico", categoria: "Tecnologia", costo: 5, posti: 40, iscritti: 35, attivo: true },
  { id: 6, titolo: "Teatro serale", categoria: "Cultura", costo: 15, posti: 25, iscritti: 9, attivo: true }
];

const postiLiberi = (evento) => evento.posti - evento.iscritti;

const eventoId3 = eventi.find((evento) => evento.id === 3);
if (eventoId3) {
  console.log(`Evento id 3: "${eventoId3.titolo}" con ${eventoId3.iscritti} iscritti`);
} else {
  console.log("Evento non trovato");
}

const eventoCompleto = eventi.find((evento) => postiLiberi(evento) === 0);
if (eventoCompleto) {
  console.log(`Primo evento completo: ${eventoCompleto.titolo}`);
} else {
  console.log("Nessun evento completo");
}

const eventoInesistente = eventi.find((evento) => evento.id === 99);
if (eventoInesistente === undefined) {
  console.log("Evento non trovato");
} else {
  console.log(eventoInesistente.titolo);
}
