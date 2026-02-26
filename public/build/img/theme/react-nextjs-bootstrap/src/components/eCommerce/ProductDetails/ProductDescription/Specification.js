"use client";

import { Card } from "react-bootstrap";

const Specification = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4 rounded-top-0">
        <Card.Body className="p-4">
          <div className="default-table-area style-two">
            <div className="table-responsive p-0">
              <table className="table table-bordered">
                <tbody>
                  <tr>
                    <td className="title text-dark">Brand</td>
                    <td className="price">Apple</td>
                  </tr>
                  <tr>
                    <td className="title text-dark">Categories</td>
                    <td className="price">Brond New</td>
                  </tr>
                  <tr>
                    <td className="title text-dark">SKU</td>
                    <td className="price">01</td>
                  </tr>
                  <tr>
                    <td className="title text-dark">Price</td>
                    <td className="price">$399 </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default Specification;
