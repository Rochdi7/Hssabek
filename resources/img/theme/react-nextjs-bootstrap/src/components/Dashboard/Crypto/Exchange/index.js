"use client";

import { Dropdown, Card, Form, Button } from "react-bootstrap";
import Image from "next/image";

const Exchange = () => {
  return (
    <>
      <Card
        className="p-0 border-0 rounded-3 mb-4 exchange-for-dark"
        style={{ backgroundColor: "#F3E8FF" }}
      >
        <div
          className="d-flex flex-wrap gap-2 justify-content-between align-items-center mb-4 p-3 px-4"
          style={{ borderBottom: "1px solid #D5D9E2" }}
        >
          <div>
            <h3 className="mb-0">Exchange</h3>
          </div>
          <Button
            type="button"
            className="p-0 border-0 bg-transparent position-relative top-3 text-black"
          >
            <span className="material-symbols-outlined fs-24">replay</span>
          </Button>
        </div>

        <Form className="p-4 pt-0">
          <div className="mb-30">
            <div className="d-flex justify-content-between align-items-center mb-3">
              <span>SELLING</span>
              <span>MAX 4,238</span>
            </div>

            <Dropdown className="action-opt mb-3">
              <Dropdown.Toggle className="bg-transparent p-0 d-flex justify-content-between align-items-center w-100">
                <div className="d-flex align-items-center gap-2">
                  <Image
                    src="/images/ethereum.png"
                    alt="cardano"
                    width={42}
                    height={42}
                  />
                  <span className="fs-14 fw-semibold text-secondary">
                    ETHEREUM (ETH)
                  </span>
                </div>
                <span className="material-symbols-outlined">
                  keyboard_arrow_down
                </span>
              </Dropdown.Toggle>

              <Dropdown.Menu className="dropdown-menu-end bg-white border box-shadow w-100">
                <Dropdown.Item
                  className="text-secondary d-flex align-items-center gap-2"
                  href="#"
                >
                  <Image
                    src="/images/ethereum.png"
                    alt="ethereum"
                    width={24}
                    height={24}
                  />
                  <span>Ethereum (BTC)</span>
                </Dropdown.Item>

                <Dropdown.Item
                  className="text-secondary d-flex align-items-center gap-2"
                  href="#"
                >
                  <Image
                    src="/images/solana.png"
                    alt="solana"
                    width={24}
                    height={24}
                  />
                  <span>Solana (SOL)</span>
                </Dropdown.Item>

                <Dropdown.Item
                  className="text-secondary d-flex align-items-center gap-2"
                  href="#"
                >
                  <Image
                    src="/images/binance.png"
                    alt="binance"
                    width={24}
                    height={24}
                  />
                  <span>Binance (BNB)</span>
                </Dropdown.Item>

                <Dropdown.Item
                  className="text-secondary d-flex align-items-center gap-2"
                  href="#"
                >
                  <Image
                    src="/images/bitcoin.png"
                    alt="binance"
                    width={24}
                    height={24}
                  />
                  <span>Cardano (ADA)</span>
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>

            <div className="position-relative z-0">
              <Form.Control
                type="text"
                className="h-55 bg-white border-0"
                placeholder="1 ETH"
              />
              <span className="fs-14 position-absolute top-50 end-0 translate-middle-y pe-3">
                $1750
              </span>
            </div>
          </div>

          <div className="mb-30">
            <div className="d-flex justify-content-between align-items-center mb-3">
              <span>SELLING</span>
              <span>MAX 4,238</span>
            </div>

            <Dropdown className="action-opt mb-3">
              <Dropdown.Toggle className="bg-transparent p-0 d-flex justify-content-between align-items-center w-100">
                <div className="d-flex align-items-center gap-2">
                  <Image
                    src="/images/solana.png"
                    alt="solana"
                    width={42}
                    height={42}
                  />
                  <span className="fs-14 fw-semibold text-secondary">
                    SOLANA (SOL)
                  </span>
                </div>
                <span className="material-symbols-outlined">
                  keyboard_arrow_down
                </span>
              </Dropdown.Toggle>

              <Dropdown.Menu className="dropdown-menu-end bg-white border box-shadow w-100">
                <Dropdown.Item
                  className="text-secondary d-flex align-items-center gap-2"
                  href="#"
                >
                  <Image
                    src="/images/ethereum.png"
                    alt="ethereum"
                    width={24}
                    height={24}
                  />
                  <span>Ethereum (BTC)</span>
                </Dropdown.Item>

                <Dropdown.Item
                  className="text-secondary d-flex align-items-center gap-2"
                  href="#"
                >
                  <Image
                    src="/images/solana.png"
                    alt="solana"
                    width={24}
                    height={24}
                  />
                  <span>Solana (SOL)</span>
                </Dropdown.Item>

                <Dropdown.Item
                  className="text-secondary d-flex align-items-center gap-2"
                  href="#"
                >
                  <Image
                    src="/images/binance.png"
                    alt="binance"
                    width={24}
                    height={24}
                  />
                  <span>Binance (BNB)</span>
                </Dropdown.Item>

                <Dropdown.Item
                  className="text-secondary d-flex align-items-center gap-2"
                  href="#"
                >
                  <Image
                    src="/images/bitcoin.png"
                    alt="binance"
                    width={24}
                    height={24}
                  />
                  <span>Cardano (ADA)</span>
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>

            <div className="position-relative z-0">
              <Form.Control
                type="text"
                className="h-55 bg-white border-0"
                placeholder="75 SOL"
              />
              <span className="fs-14 position-absolute top-50 end-0 translate-middle-y pe-3">
                $35
              </span>
            </div>
          </div>

          <Button type="submit" className="btn-primary py-2 px-4 w-100">
            <span className="d-inline-block py-1">Exchange</span>
          </Button>
        </Form>
      </Card>
    </>
  );
};

export default Exchange;
