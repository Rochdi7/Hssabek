"use client";

const Pagination = () => {
  return (
    <>
      <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
        <span className="fs-12 fw-medium">Showing 5 of 30 Results</span>

        <div className="d-flex align-items-center">
          <span className="fs-13 fw-medium me-2">1 - 10 of 12</span>
          <nav aria-label="Page navigation example">
            <ul className="pagination mb-0 justify-content-center">
              <li className="page-item">
                <a className="page-link icon" href="#" aria-label="Previous">
                  <span className="material-symbols-outlined">
                    keyboard_arrow_left
                  </span>
                </a>
              </li>
              <li className="page-item">
                <a className="page-link icon" href="#" aria-label="Next">
                  <span className="material-symbols-outlined">
                    keyboard_arrow_right
                  </span>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </>
  );
};

export default Pagination;
