import axios from "axios";
import React, { useEffect, useState } from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";

const Movie = ({auth}) => {
	const [data, setData] = useState();
	useEffect(() => {
		axios
			.get(
				"https://api.themoviedb.org/3/movie/238?api_key=12d0952d2ee273c948025b7c55a3f6f7"
			)
			.then((res) => {
				setData(res.data);
			});
		return () => {};
	}, []);

	console.log(data);

	return (
		<AuthenticatedLayout
			user={auth.user}
			header={
				<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
					Movie
				</h2>
			}
		>
			<div>Movie</div>
		</AuthenticatedLayout>
	);
};

export default Movie;
