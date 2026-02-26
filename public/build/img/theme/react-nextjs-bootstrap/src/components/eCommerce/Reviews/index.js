"use client";

import Image from "next/image";
import { Card, Table, Form } from "react-bootstrap";
import Link from "next/link";

const Reviews = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3 mb-md-4">
            <Form className="position-relative table-src-form me-0">
              <Form.Control type="text" placeholder="Search here" />

              <span className="material-symbols-outlined position-absolute top-50 start-0 translate-middle-y">
                search
              </span>
            </Form>

            <Form.Select
              className="month-select form-control"
              aria-label="Default select example"
            >
              <option defaultValue="0">Show All</option>
              <option defaultValue="1">Weekly</option>
              <option defaultValue="2">Monthly</option>
              <option defaultValue="3">Yearly</option>
            </Form.Select>
          </div>

          <div className="default-table-area manage-reviews-table">
            <div className="table-responsive">
              <Table className="table align-middle">
                <thead>
                  <tr>
                    <th scope="col">Reviewer</th>
                    <th scope="col">Review</th>
                    <th scope="col">Product</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div className="d-flex align-items-center">
                        <Image
                          src="/images/user-6.jpg"
                          className="wh-40 rounded-circle"
                          alt="user"
                          width={40}
                          height={40}
                        />
                        <div className="ms-2 ps-1">
                          <h6 className="fw-medium fs-14 mb-0">Olivia Clark</h6>
                          <span className="text-body">olivia@trezo.com</span>
                        </div>
                      </div>
                    </td>

                    <td>
                      <div className="d-flex align-items-lg-center flex-wrap gap-1 mb-2">
                        <i className="ri-star-fill fs-18 text-warning"></i>
                        <i className="ri-star-fill fs-18 text-warning"></i>
                        <i className="ri-star-fill fs-18 text-warning"></i>
                        <i className="ri-star-fill fs-18 text-warning"></i>
                        <i className="ri-star-fill fs-18 text-warning"></i>
                      </div>
                      <p className="mw-380">
                        This is a wider card with supporting text below as a
                        natural lead-in to additional content. This content is a
                        little bit.
                      </p>
                    </td>

                    <td>
                      <div className="d-flex align-items-center text-secondary hover">
                        <Image
                          src="/images/product-1.jpg"
                          className="rounded-3 wh-40"
                          alt="product"
                          width={40}
                          height={40}
                        />
                        <span className="fs-15 fw-medium ms-2">Smart Band</span>
                      </div>
                    </td>

                    <td>
                      <span className="d-block">17 Dec 2024</span>
                      <span className="d-block">08:30 PM</span>
                    </td>

                    <td>
                      <span className="badge bg-primary bg-opacity-10 text-primary p-2 fs-12 fw-normal">
                        Pending
                      </span>
                    </td>

                    <td>
                      <div className="d-flex align-items-center gap-3">
                        <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                          <span className="material-symbols-outlined text-primary fs-16">
                            download_done
                          </span>
                        </button>

                        <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                          <span className="material-symbols-outlined text-body fs-16">
                            reply
                          </span>
                        </button>

                        <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                          <span className="material-symbols-outlined text-danger fs-16">
                            delete
                          </span>
                        </button>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <div className="d-flex align-items-center">
                        <Image
                          src="/images/user-7.jpg"
                          className="wh-40 rounded-circle"
                          alt="user"
                          width={40}
                          height={40}
                        />
                        <div className="ms-2 ps-1">
                          <h6 className="fw-medium fs-14 mb-0">Zephyr Zing</h6>
                          <span className="text-body">zephyr@trezo.com</span>
                        </div>
                      </div>
                    </td>

                    <td>
                      <div className="d-flex align-items-lg-center flex-wrap gap-1 mb-2">
                        <i className="ri-star-fill fs-18 text-warning"></i>
                        <i className="ri-star-fill fs-18 text-warning"></i>
                        <i className="ri-star-fill fs-18 text-warning"></i>
                        <i className="ri-star-fill fs-18 text-warning"></i>
                        <i className="ri-star-fill fs-18 text-warning"></i>
                      </div>
                      <p className="mw-380">
                        This is a wider card with supporting text below as a
                        natural lead-in to additional content. This content is a
                        little bit.
                      </p>
                    </td>

                    <td>
                      <div className="d-flex align-items-center text-secondary hover">
                        <Image
                          src="/images/product-2.jpg"
                          className="rounded-3 wh-40"
                          alt="product"
                          width={40}
                          height={40}
                        />
                        <span className="fs-15 fw-medium ms-2">Headphone</span>
                      </div>
                    </td>

                    <td>
                      <span className="d-block">17 Dec 2024</span>
                      <span className="d-block">08:30 PM</span>
                    </td>

                    <td>
                      <span className="badge bg-primary bg-opacity-10 text-primary p-2 fs-12 fw-normal">
                        Pending
                      </span>
                    </td>

                    <td>
                      <div className="d-flex align-items-center gap-3">
                        <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                          <span className="material-symbols-outlined text-primary fs-16">
                            download_done
                          </span>
                        </button>

                        <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                          <span className="material-symbols-outlined text-body fs-16">
                            reply
                          </span>
                        </button>

                        <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                          <span className="material-symbols-outlined text-danger fs-16">
                            delete
                          </span>
                        </button>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      <div className="d-flex align-items-center">
                        <Image
                          src="/images/user-8.jpg"
                          className="wh-40 rounded-circle"
                          alt="user"
                          width={40}
                          height={40}
                        />
                        <div className="ms-2 ps-1">
                          <h6 className="fw-medium fs-14 mb-0">Nova Nectar</h6>
                          <span className="text-body">nova@trezo.com</span>
                        </div>
                      </div>
                    </td>

                    <td>
                      <div className="d-flex align-items-lg-center flex-wrap gap-1 mb-2">
                        <i className="ri-star-fill fs-18 text-warning"></i>
                        <i className="ri-star-fill fs-18 text-warning"></i>
                        <i className="ri-star-fill fs-18 text-warning"></i>
                        <i className="ri-star-fill fs-18 text-warning"></i>
                        <i className="ri-star-fill fs-18 text-warning"></i>
                      </div>
                      <p className="mw-380">
                        This is a wider card with supporting text below as a
                        natural lead-in to additional content. This content is a
                        little bit.
                      </p>
                    </td>

                    <td>
                      <div className="d-flex align-items-center text-secondary hover">
                        <Image
                          src="/images/product-3.jpg"
                          className="rounded-3 wh-40"
                          alt="product"
                          width={40}
                          height={40}
                        />
                        <span className="fs-15 fw-medium ms-2">
                          iPhone 15 Plus
                        </span>
                      </div>
                    </td>

                    <td>
                      <span className="d-block">17 Dec 2024</span>
                      <span className="d-block">08:30 PM</span>
                    </td>

                    <td>
                      <span className="badge bg-primary bg-opacity-10 text-primary p-2 fs-12 fw-normal">
                        Pending
                      </span>
                    </td>

                    <td>
                      <div className="d-flex align-items-center gap-3">
                        <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                          <span className="material-symbols-outlined text-primary fs-16">
                            download_done
                          </span>
                        </button>

                        <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                          <span className="material-symbols-outlined text-body fs-16">
                            reply
                          </span>
                        </button>

                        <button className="ps-0 border-0 bg-transparent lh-1 position-relative top-2">
                          <span className="material-symbols-outlined text-danger fs-16">
                            delete
                          </span>
                        </button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </Table>
            </div>

            <div className="d-flex justify-content-center justify-content-sm-between align-items-center text-center flex-wrap gap-2 showing-wrap">
              <span className="fs-13 fw-medium">Items per pages: 10</span>

              <div className="d-flex align-items-center">
                <span className="fs-13 fw-medium me-2">1 - 10 of 12</span>

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
                      <Link
                        className="page-link icon"
                        href="#"
                        aria-label="Next"
                      >
                        <span className="material-symbols-outlined">
                          keyboard_arrow_right
                        </span>
                      </Link>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default Reviews;
