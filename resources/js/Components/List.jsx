import React, { useState } from "react";
import { PropTypes } from "prop-types";
import { FaEdit } from "react-icons/fa";
import { AiOutlineCheckCircle } from "react-icons/ai";
import { TiDeleteOutline } from "react-icons/ti";
import { router } from "@inertiajs/react";

const List = ({ task, setEditing, editing }) => {
	const [editedValue, setEditedValue] = useState("");

	function handleRemove(id, e) {
		e.preventDefault();
		router.delete(`/todo/${id}`);
	}

	function handleEdit(id, e) {
		e.preventDefault();
		setEditedValue(task.value);
		setEditing(id);
	}

	function handleSubmitEdit(id, e) {
		e.preventDefault();
		if (editedValue !== task.value) {
			router.patch(`/todo/${id}`, { value: editedValue });
		}
		setEditing(null);
	}

	function handleChageEdit(e) {
		e.preventDefault();
		setEditedValue(e.target.value);
	}

	return (
		<li
			key={task.id}
			className="flex justify-between gap-x-6 py-2 hover:bg-slate-300"
		>
			<div className="flex w-full justify-between">
				{editing === task.id ? (
					<>
						<input
							onChange={handleChageEdit}
							type="text"
							name="value"
							value={editedValue}
							className="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
						/>
						<button
							type="submit"
							className="rounded-md bg-slate-700 mx-2 px-4 py-2 text-lg font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
							onClick={(e) => handleSubmitEdit(editing, e)}
						>
							<AiOutlineCheckCircle />
						</button>
					</>
				) : (
					<>
						<p className="text-sm leading-6 px-5 self-center">{task.value}</p>
						<div className="">
							<button
								type="submit"
								className="rounded-md bg-slate-700 mx-2 px-4 py-2 text-lg font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
								onClick={(e) => handleEdit(task.id, e)}
							>
								<FaEdit />
							</button>
							<button
								type="submit"
								className="rounded-md bg-slate-700 mx-2 px-4 py-2 text-lg font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
								onClick={(e) => handleRemove(task.id, e)}
							>
								<TiDeleteOutline />
							</button>
						</div>
					</>
				)}
			</div>
		</li>
	);
};

List.propTypes = {
	task: PropTypes.shape({
		id: PropTypes.number.isRequired,
		value: PropTypes.string.isRequired,
	}),
	setEditing: PropTypes.func,
	editing: PropTypes.oneOfType([PropTypes.number, PropTypes.oneOf([null])]),
};

export default List;
