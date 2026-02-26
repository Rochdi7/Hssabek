"use client";

import Link from "next/link";
import { Card } from "react-bootstrap";

const SearchContent = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <h3 className="mb-3 mb-lg-4">
            120 <span className="text-body">results found for</span> “Ipsum”
          </h3>
          <div className="p-4 border rounded-3 mb-3">
            <h3 className="fs-16 fw-medium mb-2 pb-1">What is Lorem Ipsum?</h3>
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting
              industry. Lorem Ipsum has been the industry standard dummy text
              ever since the 1500s, when an unknown printer took a galley of
              type and scrambled it to make a type specimen book. It has
              survived not only five centuries, but also the leap into
              electronic typesetting, remaining essentially unchanged. It was
              popularised in the 1960s with the release of Letraset sheets
              containing Lorem Ipsum passages, and more recently with desktop
              publishing software like Aldus PageMaker including versions of
              Lorem Ipsum.
            </p>
          </div>
          <div className="p-4 border rounded-3 mb-3">
            <h3 className="fs-16 fw-medium mb-2 pb-1">
              Why do we use it Lorem Ipsum?
            </h3>
            <p>
              It is a long established fact that a reader will be distracted by
              the readable content of a page when looking at its layout. The
              point of using Lorem Ipsum is that it has a more-or-less normal
              distribution of letters, as opposed to using Content here, content
              here making it look like readable English. Many desktop publishing
              packages and web page editors now use Lorem Ipsum as their default
              model text, and a search for lorem ipsum will uncover many web
              sites still in their infancy. Various versions have evolved over
              the years, sometimes by accident, sometimes on purpose (injected
              humour and the like).
            </p>
          </div>

          <div className="p-4 border rounded-3 mb-3">
            <h3 className="fs-16 fw-medium mb-2 pb-1">
              Where does it come from Lorem Ipsum?
            </h3>
            <p>
              Contrary to popular belief, Lorem Ipsum is not simply random text.
              It has roots in a piece of classNameical Latin literature from 45
              BC, making it over 2000 years old. Richard McClintock, a Latin
              professor at Hampden-Sydney College in Virginia, looked up one of
              the more obscure Latin words, consectetur, from a Lorem Ipsum
              passage, and going through the cites of the word in classNameical
              literature, discovered the undoubtable source.
            </p>
            <p>
              Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of de Finibus
              Bonorum et Malorum (The Extremes of Good and Evil) by Cicero,
              written in 45 BC. This book is a treatise on the theory of ethics,
              very popular during the Renaissance. The first line of Lorem
              Ipsum, Lorem ipsum dolor sit amet, comes from a line in section
              1.10.32.
            </p>
          </div>

          <div className="p-4 border rounded-3 mb-4">
            <h3 className="fs-16 fw-medium mb-2 pb-1">
              Where can I get some Lorem Ipsum?
            </h3>
            <p>
              There are many variations of passages of Lorem Ipsum available,
              but the majority have suffered alteration in some form, by
              injected humour, or randomised words which do look even slightly
              believable. If you are going to use a passage of Lorem Ipsum, you
              need to be sure there isn anything embarrassing hidden in the
              middle of text.
            </p>
            <p>
              All the Lorem Ipsum generators on the Internet tend to repeat
              predefined chunks as necessary, making this the first true
              generator on the Internet. It uses a dictionary of over 200 Latin
              words, combined with a handful of model sentence structures, to
              generate Lorem Ipsum which looks reasonable. The generated Lorem
              Ipsum is therefore always free from repetition, injected humour,
              or non-characteristic words etc.
            </p>
          </div>

          <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
            <span>Showing 4 of 30 Results</span>

            <nav aria-label="Page navigation example">
              <ul className="pagination mb-0 justify-content-center">
                <li className="page-item">
                  <Link
                    className="page-link icon"
                    href="#"
                    aria-label="Previous"
                  >
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
        </Card.Body>
      </Card>
    </>
  );
};

export default SearchContent;
