import { useState, useEffect } from "react";
import axios from "axios";

const Products = () => {
    const [recipe, setRecipe] = useState({});

    // Kører når staterne ændres
    useEffect(() => {
        getRecipe();
    }, []);

    const getRecipe = () => {
        axios
            .get("http://localhost:8000/sliks")
            .then((res) => {
                console.log(res);
                setRecipe(res.data.sliks[0]);
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                setTimeout(() => {}, 400);
            });
    };

    return (
        <div className="container margin-custom mb-5">
            <div className="divFlex">
                <h1>Opskrifter</h1>
            </div>

            <div className="row">
                <div className="col-md-6 col-12">
                    {console.log(recipe)}
                    <h3>{recipe.category}</h3>
                    <p>{recipe.name}</p>
                </div>
            </div>
        </div>
    );
};

export default Products;
