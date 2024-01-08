-- CREATE VIEW cat AS select animals.*, cats.is_litter_trained from animals join cats on cats.animal_id = animals.id;

select * from cat;

select * from cats;
select * from animals;