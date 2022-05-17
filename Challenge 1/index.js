/* get rotation of an array */
const getRotation = (item, rotation) => {
	/* chek value of item */
	if (!Array.isArray(item)) {
		return "the item must be an array";
	}
	/* check value of rotation */
	if (Number(rotation) == 0) {
		return item;
	} else if (Number(rotation) == NaN) {
		return "the rotation must be an number";
	}

	/* do rotation */
	for (let i = 0; i < rotation; i++) {
		console.log(item);
		item.push(item[0]);
		item.splice(0, 1);
	}

	/* return result */
	return item;
};

/* declaration item and rotation */
const result = getRotation([1, 2, 3, 4, 5, 6], 2);
console.log(result);
const result2 = getRotation(["satu", "dua", "tiga"], 4);
console.log(result2);
