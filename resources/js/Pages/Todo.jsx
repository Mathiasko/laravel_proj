import List from "@/Components/List";
import { router } from "@inertiajs/react";
import { PropTypes } from "prop-types";
import React, { useState } from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import Guest from "@/Layouts/GuestLayout";

const Todo = ({ tasks, auth }) => {
	const [strToSubmit, setStrToSubmit] = useState("");
	const [editing, setEditing] = useState(null);

	function handleSubmit(e) {
		e.preventDefault();
		// Make first letter uppercase
		const capitalValue = strToSubmit[0].toUpperCase() + strToSubmit.substring(1);
		router.post("/todo", { value: capitalValue });
		setStrToSubmit("");
	}

	function handleChange(e) {
		e.preventDefault();
		setStrToSubmit(() => e.target.value);
	}

	return (
		<>
			{auth ? (
				<AuthenticatedLayout
					user={auth.user}
					header={
						<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
							Todo
						</h2>
					}
				>
					<div className="p-10">
						<form onSubmit={handleSubmit} className="flex flex-col">
							<label
								htmlFor="value"
								className="block text-lg font-semibold leading-6 text-gray-900"
							>
								Add task
							</label>
							<div className="mt-2.5">
								<input
									onChange={handleChange}
									type="text"
									name="value"
									value={strToSubmit}
									placeholder="Task"
									className="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
								/>
							</div>
							<button
								type="submit"
								className="rounded-md bg-green-300 mt-2 self-end px-4 py-2 text-lg font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
							>
								Submit
							</button>
						</form>

						<ul role="list" className="divide-y divide-gray-100">
							{tasks.map((task) => (
								<List
									key={task.id}
									task={task}
									editing={editing}
									setEditing={setEditing}
								/>
							))}
						</ul>
						{/* {flash.message && <div className="alert">jako{flash.message}</div>} */}
					</div>
				</AuthenticatedLayout>
			) : (
				<Guest
					header={
						<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
							Todo, but you need to sign in
						</h2>
					}
				>
          <h1>Todo, but you need to sign in</h1>
        </Guest>
			)}
		</>
	);
};

Todo.propTypes = {
	tasks: PropTypes.arrayOf(
		PropTypes.shape({
			id: PropTypes.number.isRequired,
			value: PropTypes.string.isRequired,
		})
	).isRequired,
};

export default Todo;
