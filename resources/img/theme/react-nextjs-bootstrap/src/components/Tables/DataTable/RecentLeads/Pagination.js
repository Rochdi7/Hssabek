"use client";

import Link from "next/link";

const Pagination = () => {
  return (
    <>
      <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap p-4">
        <span className="fs-12 fw-medium">Showing 5 of 30 Results</span>

        <nav aria-label="Page navigation example">
          <ul className="pagination mb-0 justify-content-center">
            <li className="page-item">
              <Link className="page-link icon" href="#" aria-label="Previous">
                <span className="material-symbols-outlined">
                  keyboard_arrow_left
                </span>
              </Link>
            </li>
            <li className="page-item">
              <Link className="page-link active" href="#">
                1
              </Link>
            </li>
            <li className="page-item">
              <Link className="page-link" href="#">
                2
              </Link>
            </li>
            <li className="page-item">
              <Link className="page-link" href="#">
                3
              </Link>
            </li>
            <li className="page-item">
              <Link className="page-link" href="#">
                4
              </Link>
            </li>
            <li className="page-item">
              <Link className="page-link icon" href="#" aria-label="Next">
                <span className="material-symbols-outlined">
                  keyboard_arrow_right
                </span>
              </Link>
            </li>
          </ul>
        </nav>
      </div>
    </>
  );
};

export default Pagination;
