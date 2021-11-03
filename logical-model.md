### Draft návrhu logického modelu

##### User:
    - email: string
	- password: string (hash)
	- name: string
	- surname: string
	- street: string
	- city: string
	- psc: string
	- phone: string
	- is_company: bool
	- ico: string
	- dic: string
	- ic_dph: string
	- prefered_payment: Payment
	- prefered_delivery: Delivery
	- prefered_location: Warehouse


#### Cart:
    - products: Product  (Many-to-many) aj počet produktov
    - user: User

#### Admin:
	- username
	- password

#### Furniture: (Product)
	- name: string
	- description: string
	- in_offering: bool
	- price: numeric(8, 2)
	- discount: int
	- in_stock: int
	- categories: Category
	- period: Period
	- kind: Kind
	- material: string
	- country_origin: string
	- year: int
	- color: Color
	- width_cm: int
	- height_cm: int
	- depth_cm: int

#### Warehouse:
#### Payment:
#### Delivery: (Warehouse / Transport)
#### Category
	- Period
	- Color
	- Kind
